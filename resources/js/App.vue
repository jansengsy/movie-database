<template>
  <div class="content w-10/12 border-2 border-solid border-gray-500 mb-2 mt-2 p-2">
    <h1 class="font-medium leading-tight text-4xl text-red-600">Movies: </h1>
    <br>
    <button class="mb-2 mt-2 py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-white font-bold bg-green-500 hover:bg-green-700" @click="newMovieMode = true">Add movie</button>
    <div class="add-movie-form" v-if="newMovieMode">
      <MovieForm :movie="movie" :errors="errors" @save-movie="saveMovie" @cancel="closeForm"/>
    </div>
    <MovieTable :movies="movies" @delete-movie="deleteMovie"/>
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
        this.newMovieMode = false;
      },
      async getMovies() {
        try {
          const response = await axios.get('http://localhost:8000/api/movies');
          this.movies = response.data;
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
          await axios.post('http://localhost:8000/api/movies', this.movie);
          this.errors = {};
          this.getMovies();
        } catch (error) {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          } else {
            console.log(error);
          }
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