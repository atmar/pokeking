<template>
  <transition name="fade">
    <div v-if="pokeking" class="section mt-6 mx-auto">
      <h1 class="font-medium text-3xl mb-2 text-center">PokeKing</h1>
      <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white mx-auto">
        <img class="mx-auto p-5" :src="pokeking.sprites.front_default" :alt="pokeking.name">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">{{ pokeking.name | capitalize }}</div>
          <p class="text-gray-700 text-base">
            {{ pokeking.name | capitalize }} has the highest base stats and is the PokeKing!
          </p>
        </div>
        <div class="px-6 py-4">
          <span v-for="stat in pokeking.stats" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" :key="stat.stat.name">{{ stat.stat.name | capitalize }}: {{ stat.base_stat }}</span>
        </div>
        <div class="px-6 py-4">
          <span v-for="type in pokeking.types" class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-3" :key="type.type.name">{{ type.type.name | capitalize }}</span>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  data() {
    return {
      pokeking: null,
      loading: false
    };
  },
  methods: {
    async declare() {
      this.loading = true;
      try {
        let { data } = await axios.get(`/api/v1/pokeking`);
        this.loading = false;
        this.pokeking = data.pokeking;
      } catch (err) {
        this.loading = false;
      }
    }
  }
};
</script>

<style>
</style>