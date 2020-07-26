<template>
    <div
        :class="classes">
        <span v-if="this.completionPercentage == 100">
            <AwardIcon />
        </span>
        <span v-else>
            {{ completionPercentage.toFixed(2) }} %
        </span>
    </div>
</template>

<script>
    import { AwardIcon } from 'vue-feather-icons';

    export default {
        name: "completion-display",

        components: {
            AwardIcon,
        },

        props: {
            completionPercentage: {
                required: true,
                type: Number,
            },
        },
        data () {
            return {

            };
        },
        methods: {
        },
        computed: {
            classes () {
                let colorClass = '';
                let transformedPercentage = Math.floor(this.completionPercentage / 10) * 100;

                if (transformedPercentage < 100) {
                    colorClass = ' bg-gray-200';
                }
                else if (transformedPercentage == 1000) {
                    colorClass = ' bg-green-400';
                }
                else {
                    colorClass = ` bg-green-${transformedPercentage}`;
                }

                return 'rounded-full px-2 py-1' + colorClass;
            },
        },
    }
</script>