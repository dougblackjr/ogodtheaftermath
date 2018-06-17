<template>
	<div class="col-md-6">
		<img v-bind:src="imgPath" />
	</div>
</template>

<script>
	export default {
		props: ['ingif'],
		data() {
			return {
				gif: this.ingif
			}
		},
		computed: {
			imgPath() {
				return this.gif
			}
		}
	}
</script>