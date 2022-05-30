<template>
  <div class="content w-10/12 border-2 border-solid border-gray-500 mb-2 mt-2 p-2">
    <MovieForm :movie="movie" :errors="errors" @save-movie="saveMovie"/>
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