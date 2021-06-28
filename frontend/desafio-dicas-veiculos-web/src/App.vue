<template>
  <v-app>
    <top-bar />
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <v-col cols="2">
            <side-menu />
          </v-col>

          <v-col>
            <v-sheet min-height="70vh" rounded="lg">
              <router-view />
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import SideMenu from "./components/SideMenu.vue";
import TopBar from "./components/TopBar.vue";

export default {
  components: { SideMenu, TopBar },
  data: () => ({
    links: ["Dashboard", "Messages", "Profile", "Updates"],
  }),
};
</script>
