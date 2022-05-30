<template>
  <table class="table-fixed min-w-full">
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
            <td class="text-sm text-gray-900 font-light px-6 py-4">{{ movie.year }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4">{{ movie.director }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4">{{ movie.description }}</td>
            <td>
              <div role="group">
                <button>Edit</button>
              </div>
            </td>
            <td>
              <div role="group">
                <button @click="deleteMovie(movie.id)">Delete</button>
              </div>
            </td>
          </tr>
      </tbody>
    </table>
</template>

<script>
  export default {
    props: [
      'movies',
    ],
    methods: {
      deleteMovie(id) {
        this.$emit('delete-movie', id);
      }
    }
  }
</script>