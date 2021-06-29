<template>
  <v-app-bar app color="white" flat>
    <v-container class="py-0 fill-height">
      <div class="d-flex align-center">
        <v-img
          class="shrink round"
          contain
          src="@/assets/logo.png"
          transition="scale-transition"
          width="170"
        />
      </div>

      <v-spacer></v-spacer>
      <v-spacer></v-spacer>

      <div v-if="token">
        <v-btn small @click="logout" text>Sair</v-btn>
      </div>
      <div v-else>
        <register />
        <login />
      </div>
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
  methods: {
    logout() {
      this.$store.commit("logout");
      sessionStorage.clear();
    },
  },
};
</script>

<style>
.round {
  border-radius: 12px;
}
</style>
