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
				gif: (this.ingif ? this.ingif : 'https://media.giphy.com/media/xTiTnDtaiN5cD21tQY/giphy.gif')
			}
		},
		computed: {
			imgPath() {
				return this.gif
			}
		}
	}
</script>