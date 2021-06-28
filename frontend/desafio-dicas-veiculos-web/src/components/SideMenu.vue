<template>
  <v-sheet rounded="lg">
    <v-list color="transparent">
      <v-list-item v-for="menu in menus" :key="menu" link>
        <v-list-item-content>
          <v-list-item-title> {{ menu }} </v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-divider class="my-2"></v-divider>

      <v-list-item link color="grey lighten-4">
        <v-list-item-content>
          <v-list-item-title> Refresh </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-sheet>
</template>

<script>
export default {
  data: () => ({
    menus: ["Dicas", "Marcas", "Veículos"],
  }),
};
</script>

<style>
</style>
