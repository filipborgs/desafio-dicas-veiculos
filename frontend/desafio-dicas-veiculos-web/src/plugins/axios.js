import axios from "axios";
import Vue from "vue";

axios.defaults.baseURL = 'http://localhost:8000';
axios.defaults.headers.common["Content-Type"] = "application/json";
axios.defaults.headers.common["Accept"] = "application/json";
Vue.prototype.$axios = axios;

axios.interceptors.request.use(function(config) {
  const token = localStorage.getItem("token");
  if (token) {
    config.headers.Authorization = "Bearer " + token;
  }
  return config;
});
