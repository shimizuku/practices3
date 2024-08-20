<template>
    <ul v-for="y in teams">
      <li>{{y.name}}</li>
    </ul>
  </template>
  <script setup>
  import axios from 'axios';
  import {ref,onMounted,provide} from 'vue';
  const teams = ref();
  const getTeams = async ()=>{
    await axios.get('/api/teams').then((res) =>{
      teams.value = res.data
    })
  }
  onMounted(async()=>{
    await getTeams();
  })
  </script>
