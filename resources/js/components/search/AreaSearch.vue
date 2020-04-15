<template>
    <div class="form__group">
        {{ search }}
        <input @input.prevent="aa(search)" type="text" v-model="search" class="form__item">
        {{ result }}
    </div>
</template>

<script>
    export default {
        name: "AreaSearch",
        data() {
            return {
                search: '',
                response: null,
                result: null
            }
        },
        methods: {
            async getAreas() {
                let response = await axios.get('api/areas')
                this.response =  response.data.data
            },
            async aa(item) {
                return await this.response[0].children.filter( (area) => {
                    return Object.keys(area).some((key) => {
                        return String(area[key]) == this.result
                    })
                })
            }
        },
        mounted() {
            // this.getAreas()
        }
    }
</script>
