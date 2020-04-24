
export const VALIDATE_ERROR = (state, errors) => {
    state.errors = errors
}

export const CLEAR_ERROR = (state) => {
    state.errors = ''
}

export const CLEAR_LISTING = (state) => {
    state.listing = {}
}

export const PROCESSING_STATUS = (state, data) => {
    state.processing = data
}

export const CLEAR_SINGLE_ERROR = (state, data) => {
    console.log(data)
}


// Get listings

export const PUSH_LISTINGS = (state, data) => {
    state.listings.push(...data)
}

export const PUSH_LISTING = (state, {listing}) => {
    state.listing = listing
}
