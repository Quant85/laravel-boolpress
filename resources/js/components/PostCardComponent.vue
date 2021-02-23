<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="post in posts">
                    <div class="card-header">
                        <h2>Post id: {{post.id}}</h2>
                        <h2>Title: {{post.title}}</h2>
                        <h3>Title: {{post.subtitle}}</h3>
                    </div>

                    <div class="card-body">
                        <img :src="post.img" alt="qui va l'immagine del post">
                        <p>{{post.body}}</p>
                    </div>
                    <div class="card-footer">
                        <h4> Created at {{ new Date(post.created_at).toLocaleString('IT') }}</h4>
                        <h4> Created at {{ new Date(post.updated_at).toLocaleString('IT') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                posts: ""
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('api/posts').then(response => {
                this.posts = response.data.resources;
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