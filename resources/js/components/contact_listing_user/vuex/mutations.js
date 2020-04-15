
export const UPDATE_LISTING_FORM_MESSAGE  = (state, payload) => {
    state.listingForm.form.message = payload
}

export const SET_PROCESSING = (state, data) => {
    state.listingForm.processing = data
}

export const RESET_ERRORS = (state) => {
    state.listingForm.errors = []
}

export const RESET_FORM = (state) => {
    state.listingForm.form = {message: ''}
}

export const VALIDATE_ERROR = (state, data) => {
    state.listingForm.errors = data.errors
}

