<template>
  <v-dialog v-model="dialog" persistent max-width="400">
    <template v-slot:activator="{ on, attrs }">
      <v-btn x-small text v-bind="attrs" v-on="on"> Cadastre-se </v-btn>
    </template>
    <v-card>
      <v-card-title class="text-h5"> Cadastro </v-card-title>
      <v-card-text>
        <v-form ref="user_form">
          <v-row>
            <v-col cols="12">
              <v-text-field
                label="Nome"
                :rules="[requiredRule]"
                v-model="user.name"
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                type="email"
                label="E-mail"
                v-model="user.email"
                :rules="[requiredRule, emailRules]"
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                type="password"
                label="Senha"
                ref="passInput"
                v-model="user.password"
                :rules="[requiredRule, passwordRule]"
                @input="validatePassword"
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                type="password"
                label="Confirmar Senha"
                ref="passInputConfirm"
                v-model="user.confirmPassword"
                :rules="[requiredRule, passwordRule]"
                @input="validatePassword"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-form>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn text @click="dialog = false"> Cancelar </v-btn>
        <v-btn color="green darken-1" :loading="loading" text @click="register">
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
        name: "",
        email: "",
        password: "",
        confirmPassword: "",
      },
      requiredRule: (v) => !!v || "O campo é obrigatório",
      passwordRule: () =>
        this.user.password == this.user.confirmPassword ||
        "As senhas devem ser iguais ",
      emailRules: (v) => /.+@.+\..+/.test(v) || "E-mail invalido",
      dialog: false,
      loading: false,
    };
  },

  methods: {
    async register() {
      if (!this.$refs.user_form.validate()) {
        alert("Existem erros no formulário");
        return;
      }
      this.loading = true;
      try {
        await this.$axios.post("/api/users", {
          user: this.user,
        });
        alert("Usuário criado com sucesso");
      } catch (e) {
        const mens = e.response.data.message || "Erro durante a requisição";
        alert(mens);
        this.dialog = false;
      } finally {
        this.loading = false;
      }
    },

    validatePassword() {
      this.$refs.passInput.validate();
      this.$refs.passInputConfirm.validate();
    },
  },
};
</script>

<style>
</style>
