<script>
    import { Line } from 'vue-chartjs'
    import {primaryColor, secondaryColor, darkColor} from "../../../defaults";

    export default {
        name: "LineChart",
        extends: Line,
        props: [
            'url',
            'activities'
        ],
        data() {
            return {
                data: {
                    rows: [],
                    labels: []
                }
            }
        },
        methods: {
            fetchData() {
                return axios.get(`/${this.url}`).then( (response) => {
                    this.data = response.data.data
                    this.getData()
                })
            },
            getData() {
                this.labels = this.data.labels
                this.rows = this.data.rows
                this.setChart()

            },
            setChart () {
                this.renderChart({
                    labels: this.labels,
                    datasets: [
                        {
                            label: this.activities,
                            backgroundColor: ['rgba(33, 130, 255, 0.75)'],
                            borderWidth: '3',
                            borderColor: darkColor,
                            pointRadius: '3',
                            pointBackgroundColor: darkColor,
                            pointHoverBackgroundColor: secondaryColor,
                            pointHoverBorderColor: darkColor,
                            data: this.rows
                        }
                    ]
                }, {responsive: true, maintainAspectRatio: false})
            }
        },
        mounted() {
            this.fetchData()
        }
    }
</script>

