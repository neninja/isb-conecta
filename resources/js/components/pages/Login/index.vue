<template>
    <div>
        <div class="hero-body">
            <div class="container logo">
                <figure class="image is-3by1">
                    <!--
                        <img src="https://bulma.io/images/placeholders/720x240.png">
                    -->
                </figure>
            </div>
        </div>

        <div class="box">
            <Form/>
        </div>
    </div>
</template>
<style scoped>
.container.logo {
    max-width: 300px;
}
.hero {
    align-items: stretch;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.hero-body {
    flex-grow: 1;
    flex-shrink: 0;
    padding: 3rem 1.5rem;
}
</style>

<script>
import Form from './Form.vue'

export default {
    components: {
        Form
    }
}
</script>
