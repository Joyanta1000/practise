const Nexmo = require('nexmo')

const nexmo = new Nexmo({
  apiKey: NEXMO_API_KEY,
  apiSecret: NEXMO_API_SECRET,
  applicationId: NEXMO_APPLICATION_ID,
  privateKey: NEXMO_APPLICATION_PRIVATE_KEY_PATH
})

nexmo.channel.send(
  { "type": "sms", "number": "+8801961902007" },
  { "type": "sms", "number": "+8801627962866" },
  {
    "content": {
      "type": "text",
      "text": "This is an SMS sent from the Messages API"
    }
  },
  (err, data) => { console.log(data.message_uuid); }
);