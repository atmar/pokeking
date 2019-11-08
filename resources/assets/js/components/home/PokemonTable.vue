<template>
  <div class="section">
    <h1 class="font-medium text-3xl mb-2">Pokemons</h1>
    <div class="max-w-m w-full rounded overflow-hidden shadow-lg mx-auto bg-white">
      <table v-if="pokemons.data && pokemons.data.length > 0" class="table-auto w-full h-64">
        <thead>
          <tr>
            <th class="px-4 py-2">Sprite</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Base Experience</th>
            <th class="px-4 py-2">Height</th>
            <th class="px-4 py-2">Weight</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="pokemon in pokemons.data" :key="pokemon.id">
            <td class="border px-4 py-2"><img :src="pokemon.sprites.front_default" class="m-auto" /></td>
            <td class="border px-4 py-2 text-center">{{ pokemon.name | capitalize }}</td>
            <td class="border px-4 py-2 text-center">{{ pokemon.base_experience}}</td>
            <td class="border px-4 py-2 text-center">{{ pokemon.height}}</td>
            <td class="border px-4 py-2 text-center">{{ pokemon.weight}}</td>
          </tr>
        </tbody>
      </table>
      <placeholder-table v-else />

      <paginate ref="paginate" :initialPage="page - 1" v-if="pokemons && pokemons.last_page > 1" :pageCount="pokemons.last_page" containerClass="pagination w-full" :clickHandler="changePage" />

      <div class="pokeking mx-auto w-full text-center m-10">
        <button @click="declarePokeking()" class="disabled:opacity-75 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Declare PokeKing</button>
      </div>
    </div>
  </div>
</template>

<script>
import Paginate from "../pagination/Paginate.vue";
import PlaceholderTable from "./PlaceholderTable.vue";

export default {
  components: {
    Paginate,
    PlaceholderTable
  },

  mounted() {
    this.getData();
  },

  data() {
    return {
      pokemons: {},
      page: 1
    };
  },

  methods: {
    async getData() {
      let { data } = await axios.get(`/api/v1/pokemons?page=${this.page}`);

      this.pokemons = data.pokemons;
    },
    scroll() {
      window.scrollTo(0, 0);
    },
    changePage(page) {
      this.pokemons.data = [];
      this.page = page;
      this.getData();
      this.scroll();
    },
    declarePokeking() {
      this.$emit('declarePokeking')
    }
  }
};
</script>

<style scoped lang="scss">
</style>