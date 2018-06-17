<template>    
    <div class="col-md-4">
        <div class="card card-default">
            <div class="card-header">{{ site.url }}</div>

            <div class="card-body">
                <div v-if="site.up" class="alert alert-success" role="alert">
                    Site is ok
                </div>
                <div v-else class="alert alert-danger" role="alert">
                    Unable to reach
                    <img v-bind:src="site.img" />
                </div>
                <p>
                    <small>
                        Last pinged: {{ site.pingedAt }}
                    </small>
                </p>
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
        }
    }
</script>
