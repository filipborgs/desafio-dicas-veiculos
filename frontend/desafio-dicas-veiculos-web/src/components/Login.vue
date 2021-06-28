<template>
  <v-dialog v-model="dialog" persistent max-width="400">
    <template v-slot:activator="{ on, attrs }">
      <v-btn text v-bind="attrs" x-small v-on="on"> Login </v-btn>
    </template>
    <v-card>
      <v-card-title class="text-h5"> Login </v-card-title>
      <v-card-text>
        <v-form>
          <v-row>
            <v-col cols="12">
              <v-text-field
                type="email"
                label="E-mail"
                v-model="user.email"
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                type="password"
                label="Senha"
                v-model="user.password"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-form>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn text @click="dialog = false"> Cancelar </v-btn>
        <v-btn color="green darken-1" text @click="dialog = false">
          Entrar
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
      dialog: false,
    };
  },
};
</script>

<style>
</style>
