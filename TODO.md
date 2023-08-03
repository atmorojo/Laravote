# TODO
## Functions
- [ ] Add candidates
    - [ ] Show screen 1.1
    - [ ] Parse 'candidates.csv' in backend
        - [ ] If the file uploaded is valid
            - [ ] Store data to db
            - [ ] Show screen 1.3 
        - [ ] If the file uploaded is not valid show screen 1.7 
- [ ] Authentication
    - [ ] Show screen 2.1
    - [ ] Check user input against data in the users table
    - [ ] If ref is found
        - [ ] Show screen 2.2
        - [ ] Redirect to 'vote.create' (GET '/votes/create')
    - [ ] Otherwise
        - [ ] Show screen 2.3
        - [ ] Redirect to screen 2.1
- [ ] Vote
    - [x] Show screen 3.1
    - [x] Post votes to 'vote.store' (POST '/votes')
    - [ ] Validate vote
    - [x] Save to 'votes' table in db
    - [ ] Show screen 3.2
    - [ ] Redirect to screen 2.1
- [ ] Show results

## Screens
1. Dashboard
    - [ ] 1.1. Upload 'candidates.csv'
        - [ ] 1.1.1 Use filepond.js
    - [ ] 1.2. Upload candidates photos
    - [ ] 1.3. Table of candidates
        - [ ] 1.3.1. Candidate ref
        - [ ] 1.3.2. Candidate name
        - [ ] 1.3.3. Delete candidate
    - [ ] 1.4. Votes result
        - [ ] 1.4.1. Candidate ref
        - [ ] 1.4.2. Candidate name
        - [ ] 1.4.2. Sum of candidate vote result
    - [ ] 1.5. Upload 'voters.csv'
        - [ ] 1.5.1 Use filepond.js
    - [ ] 1.6. List of voters
        - [ ] 1.6.1. Name
        - [ ] 1.6.2. Ref code
        - [ ] 1.6.3. Voted?
        - [ ] 1.6.4. Cancel vote
        - [ ] 1.6.5. Delete voter
    - [ ] 1.7. Invalid csv file

2. Simple authentication
    - [ ] 2.1. Input ref number
    - [ ] 2.2. Logged in message
    - [ ] 2.3. Ref not found
        - [ ] 2.3.1. Huge red x icon
        - [ ] 2.3.2. Authentication error message

3. Votes
    - [x] 3.1. Candidate list (voting page)
        - [x] 3.1.1. Candidate photos
        - [x] 3.1.2. Candidate ref
        - [x] 3.1.3. Candidate name
    - [ ] 3.2. Saved votes
        - [ ] 3.2.1. Huge green tick icon
        - [ ] 3.2.2. Vote saved message (something along the line of "Suara anda telah kami dengar. Terima kasih!")
