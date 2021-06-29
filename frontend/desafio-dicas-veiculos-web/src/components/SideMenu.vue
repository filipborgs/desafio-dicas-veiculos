<template>
  <v-sheet rounded="lg">
    <v-list color="transparent">
      <v-list-item
        v-for="menu in menus"
        :key="menu.route"
        :to="{ name: menu.route }"
        link
      >
        <v-list-item-content>
          <v-list-item-title> {{ menu.name }} </v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-divider class="my-2"></v-divider>

      <v-list-item v-if="token != null" link :to="{ name: 'cadastro' }">
        <v-list-item-content>
          <v-list-item-title> Cadastrar dica </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-sheet>
</template>

<script>
export default {
  data: () => ({
    menus: [
      { name: "Dicas", route: "home" },
      // { name: "Marcas", route: "marcas" },
      // { name: "Veículos", route: "veiculos" }
    ],
  }),
};
</script>

<style></style>
