<template>
  <div class="container mx-auto">
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
            <td class="border px-4 py-2 text-center">{{ pokemon.name }}</td>
            <td class="border px-4 py-2 text-center">{{ pokemon.base_experience}}</td>
            <td class="border px-4 py-2 text-center">{{ pokemon.height}}</td>
            <td class="border px-4 py-2 text-center">{{ pokemon.weight}}</td>
          </tr>

        </tbody>
      </table>
      <table v-else class="table-auto w-full h-64">
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
          <tr v-for="n in 5" :key="n">
            <td class="border px-4 py-2">
              <content-placeholders>
                <content-placeholders-text :lines="4" />
              </content-placeholders>
            </td>
            <td class="border px-4 py-2">
              <content-placeholders>
                <content-placeholders-text :lines="4" />
              </content-placeholders>
            </td>
            <td class="border px-4 py-2">
              <content-placeholders>
                <content-placeholders-text :lines="4" />
              </content-placeholders>
            </td>
            <td class="border px-4 py-2">
              <content-placeholders>
                <content-placeholders-text :lines="4" />
              </content-placeholders>
            </td>
            <td class="border px-4 py-2">
              <content-placeholders>
                <content-placeholders-text :lines="4" />
              </content-placeholders>
            </td>
          </tr>
        </tbody>
      </table>

      <paginate ref="paginate" :initialPage="page - 1" v-show="pokemons.last_page > 1" :pageCount="pokemons.last_page" :containerClass="'pagination w-full'" :clickHandler="changePage" />

      <div class="pokeking mx-auto w-full text-center m-10">
        <button @click="declarePokeking()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Declare PokeKing</button>
      </div>
    </div>
  </div>
</template>

<script>
import Paginate from "./Paginate.vue";

export default {
  components: {
    Paginate
  },

  mounted() {
    this.getData();
  },

  data() {
    return {
      pokemons: [],
      page: this.$route.query.page || 1
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
    }
  }
};
</script>

<style scoped lang="scss">
</style>