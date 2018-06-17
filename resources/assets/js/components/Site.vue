<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Example Component</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        This is a success alert—check it out!
                    </div>
                    <div class="alert alert-danger" role="alert">
                        This is a danger alert—check it out!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'insite'
        ],
        data() {
            return {
                site: this.insite
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
