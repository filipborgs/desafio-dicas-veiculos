<template>
  <v-container>
    <v-form ref="form">
      <tip-form ref="tip" />
    </v-form>
    <v-divider></v-divider>
    <v-spacer vertical></v-spacer>
    <v-container>
      <v-btn color="success" :loading="loading" @click="save">Salvar</v-btn>
    </v-container>
  </v-container>
</template>

<script>
import TipForm from "../components/TipForm.vue";
export default {
  components: { TipForm },

  data() {
    return {
      loading: false,
    };
  },

  methods: {
    async save() {
      if (!this.$refs.form.validate()) {
        return;
      }
      const tip = this.$refs.tip.get();
      this.loading = true;
      try {
        await this.$axios.post(
          "api/tip",
          { tip },
          { headers: { Authorization: `Bearer ${this.token}` } }
        );
        alert("Cadastrado com sucesso");
        this.$router.replace({ name: "home" });
      } catch (e) {
        alert(e.response.data.message);
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

<style></style>
