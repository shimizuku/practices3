<script setup>
import {useRouter} from 'vue-router';
import axios from 'axios';
import {ref,onMounted,provide} from 'vue';
const router = useRouter();
const getTeams = async ()=>{
  return await axios.get('/api/teams').then((res) =>{
    return res.data;
  })
}
onMounted(async()=>{
  const data = await getTeams();
  console.log(data) //値が展開されている
})
</script>
