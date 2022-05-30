<template>
  <div class="content w-10/12 border-2 border-solid border-gray-500 mb-2 mt-2 p-2">
    <h1 class="font-medium leading-tight text-4xl text-red-600">Movies: </h1>
    <br>
    <button class="mb-2 mt-2 py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-white font-bold bg-green-500 hover:bg-green-700" @click="newMovieMode = true">Add movie</button>
    <div class="add-movie-form" v-if="newMovieMode || editMovieMode">
      <MovieForm :movie="movie" :errors="errors" @save-movie="saveMovie" @cancel="closeForm"/>
    </div>
    <MovieTable :movies="movies" :loaded="loaded" @delete-movie="deleteMovie" @edit-movie="editMovie"/>
  </div>
</template>

<script>
  import MovieTable from './components/MovieTable';
  import MovieForm from "./components/MovieForm";

  import axios from 'axios';

  export default {
    data() {
      return {
        movie: {},
        movies: [],
        errors: {},
        newMovieMode: false,
        editMovieMode: false,
        id: null,
        loaded: false,
      }
    },
    components: {
      MovieTable,
      MovieForm,
    },
    created() {
      this.getMovies();
    },
    methods: {
      closeForm() {
        this.movie = {};
        this.newMovieMode = this.editMovieMode = false;
      },
      editMovie(id) {
        this.getMovie(id);
      },
      async getMovies() {
        try {
          const response = await axios.get('http://localhost:8000/api/movies');
          this.movies = response.data;
          this.loaded = true;
        } catch (error) {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          } else {
            console.log(error);
          }
        }
      },
      async saveMovie() {
        try {
          if(this.editMovieMode) {
            await axios.put(`http://localhost:8000/api/movies/${this.id}`, this.movie);
          } else {
            await axios.post('http://localhost:8000/api/movies', this.movie);
          }
          this.errors = {};
          this.closeForm();
          this.getMovies();
        } catch (error) {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          } else {
            console.log(error);
          }
        }
      },
      async getMovie(id) {
        this.id = id;
        this.editMovieMode = true;
        try {
          const response = await axios.get(`http://localhost:8000/api/movies/${id}`);
          this.movie = response.data;
          this.errors = {};
        } catch (error) {
          console.log(error);
        }
      },
      async deleteMovie(id) {
        try {
          await axios.delete(`http://localhost:8000/api/movies/${id}`);
          this.getMovies();
        } catch (error) {
          if (error.response.status === 404) {
            this.errors = error.response.data.errors;
          } else {
            console.log(error);
          }
        }
      }
    }
  }
</script>