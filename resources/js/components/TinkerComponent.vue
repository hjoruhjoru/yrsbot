<template>
    <div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Chat</div>
					<div class="card-body">
						<ul class="ChatLog">
							<li class="ChatLog__entry" v-for="message in messages" :class="{'ChatLog__entry_mine': message.isMine}">
								<img class="ChatLog__avatar" v-bind:src="message.headshot" />
								<p class="ChatLog__message">{{ message.text }}</p>
							</li>
						</ul>		
						<br>
						<el-input v-model="newMessage" placeholder="Please input question." @keyup.enter.native="sendMessage"></el-input>
						<!--input type="text" class="form-control ChatInput" @keyup.enter="sendMessage" v-model="newMessage" placeholder="Please input question."-->				
					</div>
				</div>
			</div>
		</div>		
    </div>
</template>

<style>
    input.ChatInput {
        width: 300px;
        height: 25px;
        border-radius: 5px;
        padding: 10px;
        position: absolute;
        bottom: .6em;
        left: 200px;
    }
    ul.ChatLog {
        list-style: none;
    }
    .ChatLog {
        max-width: 20em;
        margin: 0 auto;
    }
    .ChatLog .ChatLog__entry {
        margin: .5em;
    }
    .ChatLog__entry {
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        max-width: 100%;
    }
    .ChatLog__entry.ChatLog__entry_mine {
        flex-direction: row-reverse;
    }
    .ChatLog__avatar {
        flex-shrink: 0;
        flex-grow: 0;
        z-index: 1;
        height: 50px;
        width: 50px;
        border-radius: 25px;
    }
    .ChatLog__entry .ChatLog__message {
        position: relative;
        margin: 0 12px;
    }
    .ChatLog__entry .ChatLog__message__image {
        max-width: 100%;
    }
    .ChatLog__entry .ChatLog__message::before {
        position: absolute;
        right: auto;
        bottom: .6em;
        left: -12px;
        height: 0;
        content: '';
        border: 6px solid transparent;
        border-right-color: #ddd;
        z-index: 2;
    }
    .ChatLog__entry.ChatLog__entry_mine .ChatLog__message::before {
        right: -12px;
        bottom: .6em;
        left: auto;
        border: 6px solid transparent;
        border-left-color: #08f;
    }
    .ChatLog__message {
        background-color: #ddd;
        padding: .5em;
        border-radius: 4px;
        font-weight: lighter;
        max-width: 70%;
    }
    .ChatLog__entry.ChatLog__entry_mine .ChatLog__message {
        border-top: 1px solid #07f;
        border-bottom: 1px solid #07f;
        background-color: #08f;
        color: #fff;
    }
</style>

<script>
    const axios = require('axios');
    export default {
        props: {
            apiEndpoint: {
                default: '/botman',
            },
            headshot: {
				default: '',
            },
           chatbotHeadshot: {
				default: '',
           },
        },
        data() {
            return {
                messages: [],
                newMessage: null
            };
        },
        mounted() {
        },
        methods: {
            callAPI(text, interactive = false, attachment = null, callback) {
                let data = new FormData();
                const postData = {
                    driver: 'web',
                    userId: this.userId,
                    message: text,
                    interactive
                };
                Object.keys(postData).forEach(key => data.append(key, postData[key]));
                axios.post(this.apiEndpoint, data).then(response => {
                    this._addMessage(response.data, false, {}, this.chatbotHeadshot);
                    if (callback) {
                        callback(response.data);
                    }
                });
            },
            performAction(value, message) {
                this.callAPI(value, true, null, (response) => {
                    message.actions = null;
                });
            },
            _addMessage(text, isMine, original = {}, headshot) {
                this.messages.push({
                    'isMine': isMine,
                    'user': isMine ? '👨' : '🤖',
                    'text': text,
                    'original': original,
                    'headshot' : headshot
                });
            },
            sendMessage() {
                let messageText = this.newMessage;
                this.newMessage = '';
                if (messageText === 'clear') {
                    this.messages = [];
                    return;
                }
                this._addMessage(messageText, true, {'type' : 'actions'}, this.headshot);
                this.callAPI(messageText);
            }
        }
    }
</script>
