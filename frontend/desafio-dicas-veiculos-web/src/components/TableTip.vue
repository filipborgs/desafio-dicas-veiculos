<template>
  <div>
    <v-container>
      <v-row>
        <v-col>
          <v-text-field
            label="Pesquisa"
            v-model="query"
            hint="Pesquise por TÍTULO, VEICULO, MARCA OU USUÁRIO"
            persistent-hint
            @input="search"
          ></v-text-field>
        </v-col>
        <v-col>
          <v-select
            label="Tipo de veiculo"
            :items="vehicleTypes"
            v-model="type"
            value=""
            item-text="name"
            item-value="type"
            @input="search"
          >
          </v-select>
        </v-col>
      </v-row>
    </v-container>
    <v-divider></v-divider>
    <v-simple-table dense>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Titulo</th>
            <th class="text-left">Tipo</th>
            <th class="text-left">Veiculo</th>
            <th class="text-left">Marca</th>
            <th class="text-left">Por</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="tip in tips" :key="tip.id">
            <td>{{ tip.title }}</td>
            <td>{{ tip.vehicle.type }}</td>
            <td>{{ tip.vehicle.name }}</td>
            <td>{{ tip.vehicle.brand.description }}</td>
            <td>{{ tip.user.name }}</td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<script>
export default {
  async mounted() {
    const { data } = await this.$axios.get("/api/tips");
    this.tips = data;
  },

  data() {
    return {
      tips: [],
      query: "",
      type: "",
      vehicleTypes: [
        {
          name: "Todos",
          type: "",
        },
        {
          name: "Moto",
          type: "MOTORCYCLE",
        },
        {
          name: "Carro",
          type: "CAR",
        },
        {
          name: "Caminhão",
          type: "TRUCK",
        },
      ],
    };
  },

  methods: {
    async search() {
      const { data } = await this.$axios.get("/api/tips", {
        params: {
          search: this.query,
          type: this.type
        },
      });
      this.tips = data;
    },
  },
};
</script>

<style></style>
