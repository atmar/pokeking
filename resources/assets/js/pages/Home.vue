<template>
  <div class="container mx-auto">
    <pokemon-table @declarePokeking="declarePokeking" />
    <poke-king ref="pokeking" />
  </div>
</template>

<script>
import PokemonTable from "../components/home/PokemonTable.vue";
import PokeKing from "../components/home/PokeKing.vue";

export default {
  components: {
    PokemonTable,
    PokeKing
  },

  methods: {
    declarePokeking() {
      this.$refs.pokeking.declare();
    }
  }
};
</script>

<style scoped lang="scss">
</style>