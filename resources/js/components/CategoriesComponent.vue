<template>
    <div class="posts">
        <div class="col-md-12">
            <div class="card" v-for="(category, id) in categories" v-bind:key="id">
                <div class="card-header">
                    <h2>category id: {{category.id}}</h2>
                    <h2>Name Category: {{category.name}}</h2>
                    <h3>Adult: {{category.adult ? 'Yes' : 'No'}}</h3>
                </div>

                <div class="card-body">
                    <img :src="category.icon" alt="qui va l'immagine della categoria">
                </div>
                <div class="card-footer">
                    <h4> Created at {{ new Date(category.created_at).toLocaleString('IT') }}</h4>
                    <h4> Created at {{ new Date(category.updated_at).toLocaleString('IT') }}</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                categories: ""
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('api/categories').then(response => {
                console.log(response.data.resources);
                this.categories = response.data.resources;
                this.$set(this.posts,"category_name","")
            }).catch (error => {
                console.log(error);
            });
        }
    }
</script>

<style lang="scss" scoped>
    .card {
        display: flex;
        flex-flow: column wrap;
        align-items: center;
        margin: 4rem 4rem;
        border-radius: 2rem;
        .card-header{
            width: 90%;
        }
        .card-body{
            width: 80%;
            display: flex;
            flex-flow: column wrap;
            justify-content: center;
            text-transform: capitalize;
            img{
                margin: 20px 0;
            }
        }
    }
</style>