<template>
  <div v-if="loaded">
    <p class="mt-2 mb-2 text-center min-w-full" v-if="!movies.length">You have no data. Add some to the database by clicking 'Add Movie' below!</p>
    <table class="table-fixed min-w-full" v-else>
        <thead>
          <tr>
            <th class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">Title</th>
            <th class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">Year</th>
            <th class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">Director</th>
            <th class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">Description</th>
          </tr>
        </thead>
        <tbody>
            <tr class="border-b" v-for="movie in movies" :key="movie.id">
              <td class="text-sm text-gray-900 font-light px-6 py-4">{{ movie.title }}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ movie.year }}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ movie.director }}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 max-w-[400px]">{{ movie.description }}</td>
              <td>
                <div role="group">
                  <button class="m-1" @click="editMovie(movie.id)"><font-awesome-icon icon="edit" /></button>
                </div>
              </td>
              <td>
                <div role="group">
                  <button class="m-1" @click="deleteMovie(movie.id)"><font-awesome-icon icon="trash-can" /></button>
                </div>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
    <div v-else>
      <h1 class="font-medium leading-tight text-2xl mt-2 mb-2 text-center min-w-full">Loading...</h1>
    </div>
</template>

<script>
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

  export default {
    props: [
      'movies',
      'loaded',
    ],
    components: {
      FontAwesomeIcon,
    },
    methods: {
      editMovie(id) {
        this.$emit('edit-movie', id);
      },
      deleteMovie(id) {
        this.$emit('delete-movie', id);
      }
    }
  }
</script>