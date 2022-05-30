<template>
  <form @submit="saveMovie">
        <div class="shadow-md overflow-hidden">
          <div class="px-4 py-5 bg-white">
            <div class="grid grid-cols-3 gap-4">
              <div class="col-span-1">
                <label for="title" class="block text-sm font-medium text-gray-700">Movie Title</label>
                <input v-model="movie.title" type="text" name="title" id="title" class="mt-1 text-sm focus:border-indigo-500 block w-full shadow-sm border border-gray-400 rounded-md">
                <div v-if="errors && errors.title" class="block text-sm font-medium text-red-500">{{ errors.title[0] }}</div>
              </div>
              <div class="col-span-1">
                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                <input v-model="movie.year" type="text" name="year" id="year" class="mt-1 text-sm focus:border-indigo-500 block w-full shadow-sm border border-gray-400 rounded-md">
                <div v-if="errors && errors.year" class="block text-sm font-medium text-red-500">{{ errors.year[0] }}</div>
              </div>
              <div class="col-span-1">
                <label for="director" class="block text-sm font-medium text-gray-700">Director</label>
                <input v-model="movie.director" type="text" name="director" id="director" class="mt-1 text-sm focus:border-indigo-500 block w-full shadow-sm border border-gray-400 rounded-md">
                <div v-if="errors && errors.director" class="block text-sm font-medium text-red-500">{{ errors.director[0] }}</div>
              </div>
              <div class="col-span-3 col-start-1">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <input v-model="movie.description" type="text" name="description" id="description" class="mt-1 text-sm focus:border-indigo-500 block w-full shadow-sm border border-gray-400 rounded-md">
                <div v-if="errors && errors.description" class="block text-sm font-medium text-red-500">{{ errors.description[0] }}</div>
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