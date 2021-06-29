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
          <tr
            v-for="(tip, index) in tips"
            @click="openModal(index)"
            :key="tip.id"
          >
            <td>{{ tip.title }}</td>
            <td>{{ tip.vehicle.type }}</td>
            <td>{{ tip.vehicle.name }}</td>
            <td>{{ tip.vehicle.brand.description }}</td>
            <td>{{ tip.user.name }}</td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>

    <v-dialog v-model="modal" width="500">
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          {{ tip.title }}
        </v-card-title>

        <v-card-text>
          {{ tip.tip }}
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" text @click="modal = false"> Fechar </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
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
      tip: "",
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
          type: this.type,
        },
      });
      this.tips = data;
    },

    openModal(index) {
      this.tip = this.tips[index];
    },
  },

  computed: {
    modal: {
      get() {
        return typeof this.tip == "object";
      },
      set(val) {
        if (!val) this.tip = "";
      },
    },
  },
};
</script>

<style></style>
