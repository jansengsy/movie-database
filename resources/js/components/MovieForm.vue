<template>
  <form @submit="saveMovie">
        <div>
          <div>
            <div class="grid grid-cols-3 gap-4">
              <div class="col-span-1">
                <label for="title">Movie Title</label>
                <input v-model="movie.title" type="text" name="title" id="title">
                <div v-if="errors && errors.title" class="block text-sm font-medium text-red-500">{{ errors.title[0] }}</div>
              </div>
              <div class="col-span-1">
                <label for="year">Year</label>
                <input v-model="movie.year" type="text" name="year" id="year">
                <div v-if="errors && errors.year" class="block text-sm font-medium text-red-500">{{ errors.year[0] }}</div>
              </div>
              <div class="col-span-1">
                <label for="director">Director</label>
                <input v-model="movie.director" type="text" name="director" id="director">
                <div v-if="errors && errors.director" class="text-red-500">{{ errors.director[0] }}</div>
              </div>
              <div class="col-span-3 col-start-1">
                <label for="description">Description</label>
                <input v-model="movie.description" type="text" name="description" id="description">
                <div v-if="errors && errors.description" class="text-red-500">{{ errors.description[0] }}</div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="button" @click="cancel" class="inline-flex justify-center py-2 px-4 mr-1 border border-transparent shadow-sm text-sm font-medium rounded-md text-white font-bold bg-gray-500 hover:bg-gray-700">Cancel</button>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white font-bold bg-green-500 hover:bg-green-700">Save</button>
          </div>
        </div>
      </form>
</template>

<script>
  export default {
    props: [
      'movie',
      'errors',
    ],
    data() {
      return {
        newMovie: {},
      }
    },
    methods: {
      saveMovie(e) {
        e.preventDefault();
        this.$emit('save-movie');
      },
      cancel() {
        this.$emit('cancel');
      }
    }
  }
</script>