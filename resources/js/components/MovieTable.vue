<template>
  <table class="table-fixed min-w-full">
      <thead>
        <tr>
          <th>Title</th>
          <th>Year</th>
          <th>Director</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
          <tr class="border-b" v-for="movie in movies" :key="movie.id">
            <td>{{ movie.title }}</td>
            <td>{{ movie.year }}</td>
            <td>{{ movie.director }}</td>
            <td>{{ movie.description }}</td>
            <td>
              <div role="group">
                <button>Edit</button>
              </div>
            </td>
            <td>
              <div role="group">
                <button>Delete</button>
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
    ]
  }
</script>