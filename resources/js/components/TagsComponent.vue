<template>
    <div class="tags">
        <div class="col-md-12">
            <div class="card" v-for="(tag, id) in tags" v-bind:key="id">
                <div class="card-header">
                    <h2>Tag id: {{tag.id}}</h2>
                    <h2>Name Tag: #{{tag.name}}</h2>
                    <h3>Slug: {{tag.slug ? tag.slug : ' No Slug'}}</h3>
                    <p>Description: {{tag.description}}</p>
                </div>
                <div class="card-footer">
                    <h4> Created at {{ new Date(tag.created_at).toLocaleString('IT') }}</h4>
                    <h4> Created at {{ new Date(tag.updated_at).toLocaleString('IT') }}</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tags: ""
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('api/tags').then(response => {
                console.log(response.data.resources);
                this.tags = response.data.resources;
                //this.$set(this.posts,"category_name","")
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