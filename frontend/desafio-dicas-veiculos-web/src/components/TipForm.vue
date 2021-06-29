<template>
    <v-row>
        <v-col cols="12">
            <v-text-field
                label="Título"
                :rules="[requiredRule]"
                v-model="tip.title"
            ></v-text-field>
        </v-col>
        <v-col cols="6">
            <v-text-field
                label="Marca"
                :rules="[requiredRule]"
                v-model="tip.vehicle.brand.description"
            ></v-text-field>
        </v-col>
        <v-col cols="6">
            <v-text-field
                label="Veiculo"
                v-model="tip.vehicle.name"
                :rules="[requiredRule]"
            ></v-text-field>
        </v-col>
        <v-col cols="4">
            <v-select
                label="Tipo"
                :items="vehicleTypes"
                v-model="tip.vehicle.type"
                itemValue="type"
                item-text="name"
                :rules="[requiredRule]"
            ></v-select>
        </v-col>
        <v-col cols="4">
            <v-text-field
                label="Modelo"
                v-model="tip.vehicle.model"
                :rules="[requiredRule]"
            ></v-text-field>
        </v-col>
        <v-col cols="4">
            <v-text-field
                label="Versão"
                v-model="tip.vehicle.version"
            ></v-text-field>
        </v-col>
        <v-col cols="12">
            <v-textarea
                label="Dica"
                v-model="tip.tip"
                :rules="[requiredRule]"
            ></v-textarea>
        </v-col>
    </v-row>
</template>

<script>
export default {
    data() {
        return {
            requiredRule: v => !!v || "O campo é obrigatório",

            tip: {
                tip: "",
                title: "",
                vehicle: {
                    name: "",
                    type: "",
                    model: "",
                    version: "",
                    brand: {
                        description: ""
                    }
                }
            },

            vehicleTypes: [
                {
                    name: "Moto",
                    type: "MOTORCYCLE"
                },
                {
                    name: "Carro",
                    type: "CAR"
                },
                {
                    name: "Caminhão",
                    type: "TRUCK"
                }
            ]
        };
    },

    methods: {
        get() {
            return this.tip;
        }
    }
};
</script>

<style></style>
