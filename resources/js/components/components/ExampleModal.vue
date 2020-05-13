<template>
	<div>
        <a href="#" class="btn btn--primary" @click.prevent="$modal.show('hello', {name: 'Claude'})">Open Modal</a>
        <modal-component name="hello" @before-open="loadCources">
            <template slot="header">
                {{ cources.title }}
            </template>
            <template slot="body" slot-scope="{ params }">
                <p>
                    {{ cources.body }}
                </p>
            </template>
        </modal-component>

    </div>
</template>

<script>
    export default {
        name: "ExampleModal",
        data () {
            return {
                cources: []
            }
        },
        components: {},
        methods: {
            async loadCources (done) {
                let response  = await axios.get('https://jsonplaceholder.typicode.com/posts/1')
                this.cources = response.data
                done()
            }
        },
    }
</script>
