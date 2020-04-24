import moment from "moment";


export default {

    data() {
        return {
            // moment: moment
        }
    },
    filters: {
        moment(date) {
            return moment(date).format('MMMM Do YYYY, h:mm:ss a');
        },
        toNow(date) {
            return moment(date).from();
        }
    }

}
