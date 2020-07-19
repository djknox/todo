<template>
    <div class="card">
        <group-display
            :initial-group="group">
        </group-display>
    </div>
</template>

<script>
    export default {
        name: "group-controller",

        props: {
            initialGroup: {
                required: true,
                type: Object,
            },
        },
        data () {
            return {
                group: this.initialGroup,
            };
        },
        methods: {
            
        },
    }
</script>