<template>
  <div class="content w-10/12">
    <MovieTable />
    <MovieForm />
  </div>
</template>

<script>
  import MovieTable from './components/MovieTable';
  import MovieForm from "./components/MovieForm";

  export default {
    components: {
      MovieTable,
      MovieForm,
    },
  }
</script>