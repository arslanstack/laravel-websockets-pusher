// services/PusherService.js
import { Pusher } from '@pusher/pusher-websocket-react-native';
import * as Notifications from 'expo-notifications';

const pusher = Pusher.getInstance();

export const initPusher = async () => {
  await pusher.init({
    apiKey: '4a4816565947ed5cf64f',
    cluster: 'ap1',
  });

  await pusher.connect();
};

export const subscribeToChannel = (channelName, onEventCallback) => {
  pusher.subscribe({
    channelName,
    onEvent: (event) => {
      onEventCallback(event);
    },
  });
};

export const registerForPushNotifications = async () => {
  const { status: existingStatus } = await Notifications.getPermissionsAsync();
  let finalStatus = existingStatus;

  if (existingStatus !== 'granted') {
    const { status } = await Notifications.requestPermissionsAsync();
    finalStatus = status;
  }

  if (finalStatus !== 'granted') {
    console.error('Failed to get push token for push notification!');
    return;
  }

  const token = (await Notifications.getExpoPushTokenAsync()).data;
  console.log('Expo Push Token:', token);

  // Now you can send the token to your server and use it to send push notifications
  // using Pusher or any other service
};

// Correct export statement
export { pusher };
