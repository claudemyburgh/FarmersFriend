
export const PROCESSING_STATUS = (state, data) => {
    state.processing = data
}

export const PUSH_LISTINGS = (state, data) => {
    state.listings.push(...data)
}

export const PUSH_LISTING = (state, {listing}) => {
    state.listing = listing
}


export const POP_LISTINGS = (state, data) => {
    state.listing.pop(...data)
}
