
import moment from "moment";

export default {
    data() {
        return {
            moment: moment
        }
    },
    filters: {
        momentDate(date) {
            return moment(date).format('MMMM Do YYYY, h:mm:ss a');
        },
        toNow(date) {
            return moment(date).from();
        }
    }

}
