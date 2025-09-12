import axios from 'axios';


const API = axios.create({
baseURL: 'http://10.0.2.2:8000/api', // Android emulator; use your machine IP for physical device
timeout: 10000,
});


export default API;