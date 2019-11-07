<template>
  <div class="container mx-auto">
    <div class="max-w-sm w-full lg:flex rounded overflow-hidden shadow-lg mx-auto">
      <table class="table-auto mx-auto">
        <thead>
          <tr>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Author</th>
            <th class="px-4 py-2">Views</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border px-4 py-2">Intro to CSS</td>
            <td class="border px-4 py-2">Adam</td>
            <td class="border px-4 py-2">858</td>
          </tr>
          <tr class="bg-gray-100">
            <td class="border px-4 py-2">A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
            <td class="border px-4 py-2">Adam</td>
            <td class="border px-4 py-2">112</td>
          </tr>
          <tr>
            <td class="border px-4 py-2">Into to JavaScript</td>
            <td class="border px-4 py-2">Chris</td>
            <td class="border px-4 py-2">1,280</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.initialize();
  },

  data() {
    return {
      pokemons: []
    };
  },

  methods: {
    async initialize() {
      let { data } = await axios.get("/api/v1/pokemons");

      this.pokemons = data.pokemons;
    }
  }
};
</script>

<style>
</style>