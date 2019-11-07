<template>
  <table class="table-auto w-full h-64">
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
</template>

<script>
export default {};
</script>

<style>
</style>