


export const getListingForm = (state) => {
    return state.listingForm
};

export const getListingFormMessage = (state) => {
    return state.listingForm.form
};

export const getListingFormResponse = (state) => {
    return state.listingForm.response
};

export const processing = (state) => {
    return state.listingForm.processing
};

export const getErrors = (state) => {
    return state.listingForm.errors
};

export const getListingStatus = (state) => {
    return state.listingStatus
}
