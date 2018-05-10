<template>
    <div class="card border-0 box-shadow">
        <div class="card-body">
            <h6 class="border-bottom border-gray pb-2 mb-3">Your API keys</h6>

            <p class="mb-0" v-if="apiTokens.length === 0">
                You have not created any personal access tokens.
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                apiTokens: [],
            }
        },

        ready() {
            this.prepareComponent();
        },

        mounted() {
            this.prepareComponent();
        },

        methods: {
            prepareComponent() {
                this.getKeys();
            },

            getKeys() {
                axios.get('/api-tokens')
                    .then(response => { this.apiTokens = response.data.data; });
            }
        }
    }
</script>
