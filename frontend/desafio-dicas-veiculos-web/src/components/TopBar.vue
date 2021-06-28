<template>
  <v-app-bar app color="white" flat>
    <v-container class="py-0 fill-height">
      <div class="d-flex align-center">
        <v-img
          class="shrink mr-2 round"
          contain
          src="@/assets/logo.png"
          transition="scale-transition"
          width="170"
        />
      </div>

      <v-spacer></v-spacer>
      <v-spacer></v-spacer>

      <register />

      <login />
    </v-container>
  </v-app-bar>
</template>

<script>
import Register from "../components/Register.vue";
import Login from "./Login.vue";

export default {
  components: { Login, Register },
  data: () => ({
    links: [
      { name: "Cadastre-se", route: "register" },
      { name: "Login", route: "login" },
    ],
  }),
};
</script>

<style>
.round {
  border-radius: 12px;
}
</style>
